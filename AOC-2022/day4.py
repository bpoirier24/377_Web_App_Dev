file = open('day4-snippet.txt','r')
lines = file.readlines()

total = 0 
for line in lines:
    line = line.strip()

    elf1, elf2 = line.split(',')

x1,x2 = [int(num) for num in elf1.split('-')]
y1,y2 = [int(num) for num in elf2.split('-')]

if (x1 >= y1 and x1 <=)
