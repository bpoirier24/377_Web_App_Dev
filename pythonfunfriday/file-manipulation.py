import os
import shutil


def rename_photos():
    path = "C:/Users/bpoir/OneDrive/Pictures/random images"
    prefix = input("Enter the filename prefix")

    i = 0
    files = os.listdir(path)
    files.sort()
    for filename in os.listdir(path):
        extension = filename.split(".")[1].lower()
        if extension in [ "jpg", "png", "gif","bmp","svg"]:
            print(filename)

            source = path + "/" + filename
            destination = path + "/" + prefix + str(i) + "." + extension

            os.rename(source, destination)

            i += 1

def copy_file():
    original = 'C:/Users/bpoir/OneDrive/Pictures/random images'
    filename, extension = original.split('.')\
    
    for i in range(5):
        copy_filename = filename + ' - Copy ' + '.' + extension 
        print(copy_filename)
        shutil.copyfile(original,copy_filename)

copy_file()