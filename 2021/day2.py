lines = [str(i) for i in open('day2.txt').readlines()]

h = 0
d = 0

for val in lines:
  x = int(val.split()[1])
  char = val[0]
  if (char == 'f'):
    h += x
  if (char == 'u'):
    d -= x
  if (char == 'd'):
    d += x

print(h * d)


h = 0
d = 0
a = 0

for val in lines:
  x = int(val.split()[1])
  char = val[0]
  if (char == 'f'):
    h += x
    d += a * x
  if (char == 'u'):
    a -= x
  if (char == 'd'):
    a += x

print (h * d)
