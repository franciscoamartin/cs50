#include <cs50.h>
#include <stdio.h>
#include <math.h>

void greedy(float money)                
{                                       
    money *= 100.0;                     
    int change = money;                 
    if (money - (float)change < 0.5)
        change--;
    if (money - (float)change > 0.5)
        change++;                       
    int count=0;
        count += change/25;
        change = change%25;
        count += change/10;
        change = change%10;
        count += change/5;
        change = change%5;
        count += change;                
    printf("%d\n",count);               
}

int main(void)
{
    printf("O hai! How much change is owed?\n");
    float money = GetFloat();                      
    if (money >= 0)
        greedy(money);              
    else
    {
        while(true)                 
        {                          
            if (money >= 0)
            {
                greedy(money);
                break;             
            }
            else if(money < 0)
                 {
                     printf("How much change is owed?\n");
                     money = GetFloat();
                     continue;    
                 }
                 else               
                 {
                     printf("Retry:\n");
                     money = GetFloat();
                     continue;    
                 }
        }
    }
    return 0;
}
