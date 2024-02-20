import math

lines = [str(i).strip() for i in open('day3.txt').readlines()]

length = len(lines[0])

counts = [0] * length

for line in lines:
  for idx, char in enumerate(line):
    if char == '0' or char == '1':
      counts[idx] += int(char)

gamma = ['0'] * length
epsilon = ['0'] * length

for idx, val in enumerate(counts):
  if (val > (len(lines) / 2)):
    gamma[idx] = '1'
  else:
    epsilon[idx] = '1'

gammaDec = int(''.join(gamma), 2)
epsilonDec = int(''.join(epsilon), 2)

print(gammaDec * epsilonDec)

# for each position find the most common value
# then filter the array to only the ones with that value in that position
# then move one bit to the right
# stop when you have only one

remainingLines = lines

for i in range(0, len(lines[0])):
  if (len(remainingLines) == 1):
    break

  oneCount = 0
  zeroCount = 0
  for line in remainingLines:
    if (line[i] == '1'):
      oneCount += 1
    else:
      zeroCount += 1


  if (oneCount >= zeroCount):
    remainingLines = list(filter(lambda x: x[i] == '1', remainingLines))
  else:
    remainingLines = list(filter(lambda x: x[i] == '0', remainingLines))

oxygenDec = int(remainingLines[0], 2)

remainingLines = lines

for i in range(0, len(lines[0])):
  if (len(remainingLines) == 1):
    break

  oneCount = 0
  zeroCount = 0
  for line in remainingLines:
    if (line[i] == '1'):
      oneCount += 1
    else:
      zeroCount += 1


  if (zeroCount > oneCount):
    remainingLines = list(filter(lambda x: x[i] == '1', remainingLines))
  else:
    remainingLines = list(filter(lambda x: x[i] == '0', remainingLines))

carbonDec = int(remainingLines[0], 2)

print(oxygenDec * carbonDec)
