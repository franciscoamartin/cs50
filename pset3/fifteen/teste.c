#include <stdio.h>


int main(void){
    int ciclos;
    int tamanho;
    printf("digite quantos ciclos passou");
    scanf("%d", &ciclos);
    do{
    for(int i = 1; i<= ciclos; i++){
        if(ciclos == 0){
            printf("Digite um valor válido");
        }else if(i % 2 == 1){
                tamanho = tamanho * 2;
            }
            else
            {
                tamanho = tamanho + 1;
            }
    
            printf("Uma árvore com 1 metro de tamanho, após %d ciclo fica com %d metros.", ciclos, tamanho);
}
    }
    while(ciclos!=10);
    return(0);
    
}