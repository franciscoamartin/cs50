#include <stdio.h>

int main (void)
{
        char nome[64];
        int idade;
        printf("digite o seu nome: ");
        scanf("%s", nome);
        printf("digite o seu idade: ");
        scanf("%d", &idade);
        printf("%s tem %d ", nome, idade);
        return (0);
        //teste
        
}