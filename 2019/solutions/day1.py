import os
import math

filename = os.path.join(os.path.dirname(__file__), '../inputs/day1.txt')

def findFuel(weight):
  fuel = math.floor(weight / 3) - 2
  if fuel < 0:
    fuel = 0
  return fuel

result = 0
fuelResult = 0
with open(filename) as fp:
  for cnt, line in enumerate(fp):
    fuel = findFuel(int(line))
    fuelResults = [fuel]
    while fuel > 0:
      fuel = findFuel(fuel)
      fuelResults.append(fuel)

    result += fuelResults[0]
    fuelResult += sum(fuelResults)

print(result)
print(fuelResult)
