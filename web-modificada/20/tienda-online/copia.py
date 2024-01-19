import datetime
import os
import shutil

dt = datetime.datetime.now()

nombre = "Copia seguridad {}-{}-{}".format(dt.day,dt.month,dt.year)

shutil.make_archive(nombre,"zip","/home/emilio/Escritorio/servicioweb")

comienzo = []

total = os.listdir()

for a in total:
    print(f"Moviendo archivo:{a}")
    if a.startswith("Copia seguridad") == True:
        comienzo.append(a)

rutadestino = "/home/emilio/Escritorio/copia-seguridad/"

for i in comienzo:
    shutil.move(i,os.path.join(rutadestino,i))
