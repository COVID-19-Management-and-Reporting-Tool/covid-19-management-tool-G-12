#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <sys/types.h>
#include <sys/socket.h>

#include <netinet/in.h>

// Function to connect to remote socket and send data to the server
int send_data(struct PatientData c)
{
	/*create socket*/
	int network_socket;
	network_socket = socket(AF_INET,SOCK_STREAM,0);

	//specify an address for the socket
	struct sockaddr_in server_address;
	server_address.sin_family = AF_INET;
	server_address.sin_port = htons(9002);
	server_address.sin_addr.s_addr = INADDR_ANY;

	int connection_status = connect(network_socket,(struct sockaddr *) &server_address, sizeof(server_address));
	// check for error with the connection
	if(connection_status == -1){
	    printf("There was an error making a connection to the remote socket\n\n");
	}

	//send data to the server
	if(send(network_socket,&c,sizeof(c),0) < 0){
		puts("Send Failed\n");
	}
	else
	{
		puts("Data sent\n");
	}

	// and then close the socket
	close(network_socket);
	return 0;
}
