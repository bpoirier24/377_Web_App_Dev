file = open('gifts.csv','r')
lines = file.readlines()

for line in lines:
    line = line.strip()
    name, gift, email = line.split(',')

    subject = 'Thank You for the gift'
    message = 'dear' + name + 