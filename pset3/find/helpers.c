/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // Verify n is non-negative
    if (n < 0)
    {
        return false;
    }
    
    // TODO: implement binary search; don't forget to return value
    
    // Define top and bottom boundary indecies of values
    int top = n - 1;
    int bottom  = 0;
    
    // Divide values in half until bounds are the same, or we find value
    while (bottom <= top)
    {
        // Define middle
        int middle = (top + bottom) / 2;
        
        // See if middle == value
        if (values[middle] == value)
        {
            return value;
        }
        
        // If value not found, figure out which half contains value; set new bounds
        else if (value < values[middle])
        {
            top = middle - 1;
        }
        else if (value > values[middle])
        {
            bottom = middle + 1;
        }
    }

    // If none of the above is satisfied, return false
    return false;
}

/**
 * Sorts array of n values using O(n^2) sorting algorithm
 */
void sort(int values[], int n)
{

    // Verify n is non-negative
    if (n < 0)
    {
        return;
    }
    
    // Implement insertion sort
    for (int i = 0, element = 0, j = 0; i < n; i++)
    {
        
        // Assign value[i] to element for handy storage
        element = values[i];
        
        // Assign i to j, so the while loop can work independent of i
        j = i;

        // If values[j] > values[j - 1], then keep moving that value to the left until it's in the right spot or j == 0
        while (j > 0 && values[j - 1] > element)
        {
            values[j] = values[j - 1];
            j = j - 1;
        }

        // When j == 0, then assign the element to values[j]
        values[j] = element;
    }
    
    return;
}