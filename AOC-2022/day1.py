file = open('day1-snippet.txt', 'r')
lines = file.readlines()

total = 0
totals = []

for line in lines:
    line = line.strip()

    if line == '':
        totals.append(total)
        total = 0
    else:
        total += int(line)

tot