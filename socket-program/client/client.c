#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include<arpa/inet.h>
#include<unistd.h>

//Create a Socket for server communication
short SocketCreate(void)
{
    short hSocket;
    //printf("Create the socket\n");
    hSocket = socket(AF_INET, SOCK_STREAM, 0);
    return hSocket;
}
// trying to conect with the server
int SocketConnect(int hSocket)
{
    int iRetval=-1;
    int ServerPort = 90190;
    struct sockaddr_in remote= {0};
    remote.sin_addr.s_addr = inet_addr("127.0.0.1"); //Local Host
    remote.sin_family = AF_INET;
    remote.sin_port = htons(ServerPort);
    iRetval = connect(hSocket,(struct sockaddr *)&remote,sizeof(struct sockaddr_in));
    return iRetval;
}

// structure for addpatient command
struct PatientData
{
	int type;
	char name[100];
	char date_of_identificaton[20];
	char covid_status[100];
	char nature[100];
	char gender[5];;
	char officer_name[100];
	char filename[200];
} checkstatus;


// function to get user input for the addpatient command
struct PatientData getpatientdata(char str[]);


/*function to determine what command has to be executed*/
int check_input(char str[])
{
	char* token = strtok(str, " ");
	char command[20];
	strcpy(command,token);
	//printf("%s\n",command);

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
	char data[10][200];
	// use a hythen as a delimeter and not space because the names may have spaces
	char* token = strtok(str,"-");

	int i = 0;
	while(token != NULL){
		strcpy(data[i],token);
		token = strtok(NULL,"-");
		++i;
	}
	struct PatientData patient1;
	// transfering the data into the structure
	patient1.type = check_input(data[0]);
	//printf("Type: %d\n",patient1.type);
	strcpy(patient1.name,data[1]);
	//printf("%s\n",patient1.name);
	strcpy(patient1.date_of_identificaton,data[2]);
	strcpy(patient1.nature,data[4]);
	strcpy(patient1.covid_status,data[3]);
	strcpy(patient1.gender,data[5]);
	strcpy(patient1.officer_name,data[6]);

	return patient1;
}

// Function to connect to remote socket and send data to the server
int send_and_receive_data(struct PatientData c, int rcv)
{
	int hSocket, read_size;

	//Create socket
    hSocket = SocketCreate();
    if(hSocket == -1)
    {
        //printf("Could not create socket\n");
        return 1;
    }
    //printf("Socket is created\n");

    if (SocketConnect(hSocket) < 0)
    {
        perror("connect failed.\n");
        return 1;
    }

    int shortRetval = send(hSocket, &c, sizeof(c), 0);
    if (shortRetval<0)
   	{
   		//printf("failed to send");
   	}
   	//printf("successfully sent to the server");

   	if(rcv)
   	{
   		char Rsp[1000];
    	int serverResponse= recv(hSocket, &Rsp, sizeof(Rsp), 0);
    	if(serverResponse<0)
    	{
    		printf("Failed to recieve data");	
    	}
    	else
    	{
    		if(strcmp("",Rsp)==0)
    		{
    			printf("No results\n");
    		}
    		else
    		{
	        	printf("Results:\n %s",Rsp);
	        	//printf("recieved successfully\n");    			
    		}
    	}
   	}
	close(hSocket);
	shutdown(hSocket,0);
	shutdown(hSocket,1);
	shutdown(hSocket,2);	
	return 0;
}

/*Control Function*/
int main(){
	//variables to store the commands
	char str[200];
	char str2[200];
	char str3[200];
	char str4[200];
	printf("                              *******COVID-19 MANAGEMENT AND REPORTING TOOL CLI*******\n");
	printf("	       Below are a list of commands you can use to interact with this command line tool.\n                   MAKE SURE TO USE HYTHENS TO SEPERATE THE DATA IN THE APPROPRIATE COMMANDS\n\n");
	printf("[Addpatient -<patient_name> -<date_of_identificaton> -<covid_status> -<nature> -<gender> -<health_officer_name>]\n");
	printf("[Check_status]\n");
	printf("[Addpatientlist -<filename.txt>]\n");
	printf("[Search -<criteria by name >]\n\n");
	printf("Use the commands as provided. Misspelt commands will not work\n\n");
	printf("#Please enter your district#:");
	char officer_district[100];
	gets(officer_district,sizeof(officer_district),stdin);
	printf("\n                                 ****You are entering data for %s district****\n",officer_district );
	while(1)
	{
		printf("\nEnter Command:\n");
		gets(str,sizeof(str),stdin);
		
		//securing the original text due to strtok's effect of changing the string for good
		strcpy(str2,str);
		strcpy(str3,str);
		strcpy(str4,str);

	    // this checks user input
		int result = check_input(str);
		//printf("%d\n",result);
		if(result == 1)
		{	
			checkstatus.type = result;
			send_and_receive_data(checkstatus,1);
		}
		else if (result == 2)
		{
			//puts(str2);
			struct PatientData s;
			send_and_receive_data(s = getpatientdata(str2),0);
			printf("Data Sent\n");
			//printf("%s\n",s.name);
		}
		else if (result == 3)
		{
			struct PatientData f;
			f = getpatientdata(str3);
			strcpy(f.filename,f.name);
			send_and_receive_data(f,0);
			printf("File Path Sent\n");
		}
		else if (result == 4)
		{
			struct PatientData cr;
			cr = getpatientdata(str4);
			send_and_receive_data(cr,1);	
		}
		else
		{
			printf("Command not supported or format is wrong\n");
		}
	}
	return 0;
}