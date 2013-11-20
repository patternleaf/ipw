#include "stdio.h"
#define PI 3.14159265359
int main() {
	char num[128];
	float degrees, radians;
	printf("Enter degrees:\n");
	scanf("%f", &degrees);
	radians = (degrees * PI / 180);
	printf("%f degrees is equal to %f radians.\n", degrees, radians);
	return 0;
}
