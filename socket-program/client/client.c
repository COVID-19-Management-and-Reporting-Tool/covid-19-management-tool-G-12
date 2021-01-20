#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <sys/types.h>
#include <sys/socket.h>

#include <netinet/in.h>

struct PatientData
{
	char name[100];
	char date_of_identificaton[20];
	char category[10];
	char gender[5];
	char user_name_for_COVID19_health_officer[100];
};

struct PatientData getpatientdata(char str[]);


/*function to determine what command has to be executed*/
int check_input(char str[])
{
	char* token = strtok(str, " ");
	char command[20];
	strcpy(command,token);
	printf("%s\n",command);

	if (strcmp("Check_status",command) == 0)
	{
		return 1;
	}
	else if (strcmp("Addpatient",command) == 0)
	{
		return 2;
	}
	else if (strcmp("Addpatientlist",command) == 0)
	{
		return 3;
	}
	else if (strcmp("Search",command) == 0)
	{
		return 4;
	}
	else 
	{
		return 5;
	}
}

/*Function to extract data from text input and put it into a structure*/
struct PatientData getpatientdata(char str[])
{

	

	
	struct PatientData patient1;
}
// Function to connect to remote socket and send data to the server
int send_data(char msg[])
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
	if(send(network_socket,&msg,sizeof(msg),0) < 0){
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

/*Control Function*/
int main(){
	char str[100];
	printf("* WELCOME TO THE COVID-19 MANAGEMENT AND REPORTING TOOL *\n");
	printf("Below are a list of commands you can use to interact with this command line tool.\nMAKE SURE TO USE HYTHENS TO SEPERATE THE DATA\n");
	printf("[Addpatient -<patient_name> -<date_of_identificaton> -<gender> -<category>]\n");
	printf("[Check_status]\n");
	printf("[Addpatientlist -<filename.txt>]\n");
	printf("[Search -<criteria by name >]\n\n");
	printf(":");
	gets(str,sizeof(str),stdin);
	
	// Check user input 
	int result = check_input(str);
	printf("%d\n",result);
	if(result == 1)
	{
		int client_message = 1;
	}

	return 0;
}