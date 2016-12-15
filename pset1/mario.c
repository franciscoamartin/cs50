#include <cs50.h>
#include <stdio.h>

void pattern(int height)   
{
    for(int i = 1;i <= height;i++)
    {
        for(int j = 1;j <= height - i;j++)
            printf(" ");
        for(int j = 1;j <= i + 1;j++)
            printf("#");
        printf("\n");
    }
}

int main(void)
{
    printf("Height:");
    int height= GetInt();
    if (height >= 0 && height <= 23) 
        pattern(height);
    else
    {                          
        while(true)
        {   
            if (height >= 0 && height <= 23)
            {
                pattern(height);
	    	    break; 
            }
	   
            else 
                if (height < 0 || height > 23)
            	{
              	    printf("Height:");
                    height = GetInt();
                    continue;  
            	} 
                else 
                {
                    printf("Retry:");
                    height = GetInt();
                    continue; 
                }
        }
    }
    return 0;
}
