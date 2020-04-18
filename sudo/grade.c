#include<stdio.h>
int main()
{
    
    int stdNum;
    int marks;
    int total;
    int avg;
    printf("Enter Marks:\n");
    for(stdNum = 0 ; stdNum <=10 ; stdNum ++)
    {
        scanf("%d", &marks);
        total = 10 *(marks);

    }
    avg = total/10;

    printf("Total Marks = %d\n", total);
    printf("Averange Marks = %d\n", avg);

    
}