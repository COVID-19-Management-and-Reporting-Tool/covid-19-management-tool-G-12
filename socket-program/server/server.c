#include<stdio.h>
#include<string.h>
#include<sys/socket.h>
#include<arpa/inet.h>
#include<unistd.h>
#include<stdlib.h>
#define MAX_LEN 100000

char seacrh_result[MAX_LEN + 1] ="";

// function to check a record
int check(char tko[], char criteria[])
{
  char *ret;
  ret = strstr(tko,criteria);
  if(ret != NULL)
  {
    return 1;
  }
  else
  {
  	//printf("Nothing\n");
   return 0;
  }
}

// search algorithm
const char* search(FILE *ptr,char search_criteria[])
{
	//open the file containing records for reading
	char string[MAX_LEN + 1];
	// get all the file contents and store them in a string
	char c;
	while(1)
	{
		c = fgetc(ptr);
		if(feof(ptr))
		{
			break;
		}
		strncat(string,&c,1);
	}
	printf("Text file contents:\n%s\n",string);

	//start
	char delimeter[] = "\n";
	char *token = strtok(string,delimeter);
	char tk[200];
	

	while(token != NULL)
	{
		strcpy(tk,token);
		if(check(tk,search_criteria))
		{
			strcat(seacrh_result,tk);
			strcat(seacrh_result,"\n");
		}
		token = strtok(NULL,delimeter);
	}
	char clear[] = "";
	strcpy(string,clear);
	//end
	return seacrh_result;
}

//create socket
short SocketCreate(void)
{
    short hSocket;
    printf("Create the socket\n");
    hSocket = socket(AF_INET, SOCK_STREAM, 0);
    return hSocket;
}
//binding the server to its port
int BindCreatedSocket(int hSocket)
{
    int iRetval=-1;
    int ClientPort = 90190;
    struct sockaddr_in  remote= {0};
    /* Internet address family */
    remote.sin_family = AF_INET;
    /* Any incoming interface */
    remote.sin_addr.s_addr = htonl(INADDR_ANY);
    remote.sin_port = htons(ClientPort); /* Local port */
    iRetval = bind(hSocket,(struct sockaddr *)&remote,sizeof(remote));
    return iRetval;
}

//control function
int main(int argc, char *argv[])
{
    int socket_desc, sock, clientLen, read_size;
    struct sockaddr_in server, client;
    FILE *fptr;
    FILE *f1,*f2;
    char ch;
    FILE *fp;
	char line[301];
	int found=0;
	int line_count=0;
	
	char filepath[]="/home/elijah/Desktop/covid-19-management-tool/cron_job/patient.txt";

	struct data
	{
		int type;
		char name[100];
		char date_of_identificaton[20];
		char covid_status[100];
		char nature[100];
		char gender[5];;
		char officer_name[100];
		char filename[200];
	};
    
   
    
    //Create socket
    socket_desc = SocketCreate();
    if (socket_desc == -1)
    {
        printf("Could not create socket");
        return 1;
    }
    printf("Socket created\n");
    //Bind
    if( BindCreatedSocket(socket_desc) < 0)
    {
        //print the error message
        perror("bind failed.");
        return 1;
    }
    printf("bind done\n");
    //Listen
    listen(socket_desc, 3);
    //Accept and incoming connection
    while(1)
    {
	        printf("Waiting for incoming connections...\n");
	        clientLen = sizeof(struct sockaddr_in);
	        //accept connection from an incoming client
	        sock = accept(socket_desc,(struct sockaddr *)&client,(socklen_t*)&clientLen);
	        if (sock < 0)
	        {
	            perror("accept failed");
	            return 1;
	        }
	        printf("Connection accepted\n");
	        
	        //Receive a reply from the client
	        struct data patient_info;
	       

		
	    if( recv(sock, &patient_info, sizeof(patient_info), 0) < 0)
	        {
	            printf("recv failed");
	            
	        }
	        int choice=patient_info.type;
	        printf("%d\n",choice);
	        

	      //addpatient option
	     if(choice==2)
	     {
	        fptr=fopen("/home/elijah/Desktop/covid-19-management-tool/cron_job/patient.txt","a");
			if (fptr==NULL)
			{
				printf("file failed to open");
				continue;
				exit(1);
			}
		  	FILE *fileptr;
		  	fileptr = fopen("/home/elijah/Desktop/covid-19-management-tool/cron_job/nums.txt","r");
		  	char filecontent[10];
		  	fscanf(fileptr,"%s",filecontent);
		  	fclose(fileptr);
		  	printf("String: %s\n",filecontent);
		  	int id = atoi(filecontent);
		  	if(id == 0)
		  	{
		  		++id;
		  	}
		  	fprintf(fptr,"%d\t%s\t%s\t%s\t%s\t%s\t%s\t0\n",id,patient_info.name,patient_info.date_of_identificaton,patient_info.covid_status,patient_info.nature,patient_info.gender,patient_info.officer_name);
		  	fclose(fptr);
		  	printf("Integer %d\n",id );
		  	++id;
		  	printf("After :) %d\n",id);
		  	FILE *fileptr2;
		  	fileptr2 = fopen("/home/elijah/Desktop/covid-19-management-tool/cron_job/nums.txt","w");
		  	fprintf(fileptr2,"%d",id);
		  	fclose(fileptr2);
		  	printf("successfully added a patient\n");
		  	printf(" case one is run\n");
	       }   
	       //addpatientlist 
	    else if(choice==3)
	    {

		   	printf("%d\n",choice);
		      
		  	f1=fopen(patient_info.filename,"r");
		  	
		 	if(f1==NULL)
		 	{
		 		printf("error opening file one\n");
		 	}
		 	f2=fopen("/home/elijah/Desktop/covid-19-management-tool/cron_job/patient.txt","a");
		 	if(f2==NULL)
		 	{
		 		printf("error opening file two\n");
		 	}
			char temp_buffer[MAX_LEN+1];

			char character;
			while(1)
			{
				character = fgetc(f1);
				if(feof(f1))
				{
					break;
				}
				strncat(temp_buffer,&character,1);
			}
			fprintf(f2,"%s",temp_buffer);
			char clear_it[] = "";
			strcpy(temp_buffer,clear_it);
		 	fclose(f1);
		 	fclose(f2);
	 	}  
	 	//search
	 	else if(choice==4)
	 	{
	 		FILE *pointer;
	 		pointer = fopen(filepath,"r");
	 		const char* s_result = search(pointer,patient_info.name);
	 		char clean[] = "";
	 		char s[1000];
	 		strcpy(s,s_result);
	 		printf("%s\n",s);
	 		printf("%ld",strlen(s));
			if( send(sock, &s, sizeof(s), 0) < 0)
	        {
	            printf("Send failed");
	        }
	        else
	        {
	        	printf("Search Results sent\n");
	        	strcpy(seacrh_result,clean);
	        }
	        strcpy(seacrh_result,clean);
		}
		//check_status
		else if(choice==1)
		{
			//open file
			FILE *fp;
			char line[301];
			int found=0;
			int line_count=0;
			char filepath[]="/home/elijah/Desktop/covid-19-management-tool/cron_job/patient.txt";
			fp=fopen(filepath,"r");
			if(fp==NULL)
			{
				printf("\n ERROR: failed to open file %s",filepath);	
			}
			
			//read file line by line
			while(!feof(fp))
			{
				fgets(line,300,fp);			
				line_count++;
			}
			
			printf("\n there are %d records in the file\n",line_count-1);
			int lines=line_count-1;
			char number_of_lines[20];
			sprintf(number_of_lines,"%d",lines);
			if( send(sock, &number_of_lines, sizeof(number_of_lines), 0) < 0)
	        {
	            printf("Send failed");
	            return 1;
	        }
			fclose(fp);
		}
		else
		{
			printf("no choce made");
		}
                                         
	} 
	close(sock);
	sleep(1);
	return 0;
}

