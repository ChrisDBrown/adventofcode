import numpy as np

lines = [str(i).strip() for i in open('day4.txt').readlines()]

instructions = [int(i) for i in lines.pop(0).split(',')]
lines.pop(0)

boards = []
board = []

for line in lines:
  if line == '':
    boards.append(board)
    board = []
    continue

  board.append(line)
boards.append(board)

gridboards = []

for board in boards:
  gridboard = []
  for row in board:
    row = [int(x) for x in list(filter(lambda x: x!= '', row.split(' ')))]
    gridboard.append(row)

  gridboards.append(np.array(gridboard))

def isWinner(callouts, board):
  for row in board:
    if (all(elem in callouts for elem in row)):
      return True
  for row in board.T:
    if (all(elem in callouts for elem in row)):
      return True
  return False

def getFirstWinner(gridboards, instructions):
  for i in range(1, len(instructions)):
    callouts = instructions[0:i]

    for gridboard in gridboards:
      if isWinner(callouts, gridboard):
        return gridboard, callouts

def calculateScore(board, callouts):
  uncalled = [x for x in board.flatten() if x not in callouts]
  return np.sum(uncalled) * callouts[-1]

firstWinner, callouts = getFirstWinner(gridboards, instructions)

print(calculateScore(firstWinner, callouts))

def getLastWinner(gridboards, instructions):
  winners = []
  target = len(gridboards)

  for i in range(1, len(instructions)):
    callouts = instructions[0:i]

    for idx, gridboard in enumerate(gridboards):
      if isWinner(callouts, gridboard) and idx not in winners:
        winners.append(idx)

      if len(winners) == target:
        return gridboard, callouts

lastWinner, callouts = getLastWinner(gridboards, instructions)

print(calculateScore(lastWinner, callouts))
