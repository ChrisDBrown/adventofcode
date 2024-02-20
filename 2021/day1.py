lines = [int(i) for i in open('day1.txt').readlines()]

count = 0

for idx, val in enumerate(lines):
  if (val > lines[idx - 1]):
    count += 1

print(count)

count = 0

for i in range(1, len(lines) - 2):
  a = lines[i - 1] + lines[i] + lines[i + 1]
  b = lines[i] + lines[i + 1] + lines[i + 2]

  if (b > a):
    count += 1

print(count)
