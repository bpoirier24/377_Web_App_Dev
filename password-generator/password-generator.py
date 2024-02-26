import random

SPECIALS = '!@#$%^&*()'

for i in range (20):
        choice = random.randint(0,3)


        
if choice == 0:
        character = str(random.randint(0,9))

for i in range(5):
        letter = chr(65 + random.randint(0,25))
        print(letter)

for i in range(5):
        special = SPECIALS [random.randoint(0,len(SPECIALS)-1)]
        password += special 

        print(password)


