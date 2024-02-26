import random

word_lookup = {}

file = open('dicewear-wordlist.txt','r')
lines = file.readlines()
for line in lines:
    if line [0].isdigit():
        code, word = line.split()
        word_lookup [code] = word

print(word_lookup['23241'])


code = ''
for i in range (5):
    digit = random.randint(1,6)
    code += str(digit)

    print(word_lookup[code])

    num_words = int(input("Enter number of words: "))
