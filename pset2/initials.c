#include <cs50.h>
#include <stdio.h>
#include <ctype.h>

int main(void)
{
    string name = GetString();
    char initials[10];
    int i= 0, j = 0;
    for (i=0; name[i]!='\0'; i++)
    {
        if (i == 0)
            initials[j++]=toupper(name[i]);
        if (name[i-1] == ' ')
            initials[j++]=toupper(name[i]);
    }
    for(i=0; i<j; i++)
        printf("%c",initials[i]);
    printf("\n");
    return 0;
}