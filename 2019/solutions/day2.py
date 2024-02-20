import os

filename = os.path.join(os.path.dirname(__file__), '../inputs/day2.txt')

def processIntcode(commandPosition, intcode):
  if intcode[commandPosition] == 1:
    intcode[intcode[commandPosition + 3]] = intcode[intcode[commandPosition + 1]] + intcode[intcode[commandPosition + 2]]
    return commandPosition + 4, intcode

  if intcode[commandPosition] == 2:
    intcode[intcode[commandPosition + 3]] = intcode[intcode[commandPosition + 1]] * intcode[intcode[commandPosition + 2]]
    return commandPosition + 4, intcode

  raise Exception('ya blew it')


def runIntcodeProgram(noun, verb):
  with open(filename) as fp:
    intcode = list(map(lambda x: int(x), fp.read().split(',')))
    intcode[1] = noun
    intcode[2] = verb

    nextCommandPosition = 0
    while intcode[nextCommandPosition] != 99:
      nextCommandPosition, intcode = processIntcode(nextCommandPosition, intcode)

  return intcode[0]

print('Part 1:', runIntcodeProgram(12, 2))

def solve2():
  for noun in range(100):
    for verb in range(100):
      if runIntcodeProgram(noun, verb) == 19690720:
        return noun, verb

noun, verb = solve2()
print('Part 2:', (100 * noun) + verb)
