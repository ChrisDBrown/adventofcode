import { open } from 'node:fs/promises';
const file = await open('./day1.txt');

let part1 = 0;

for await (const line of file.readLines()) {
  const current = line
    .split('')
    .filter((char) => !isNaN(parseInt(char, 10)));

    part1 += parseInt(`${current.at(0)}${current.at(-1)}`, 10);
}

console.log(part1);


let part2 = 0;

const matchMap = {
  '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9,
  'one': 1, 'two': 2, 'three': 3, 'four': 4, 'five': 5, 'six': 6, 'seven': 7, 'eight': 8, 'nine': 9
};

for await (const line of file.readLines()) {
  let first = 0;
  let last = 0;

  forward: for (let i = 0; i < line.length; i++) {
    for (const [key, value] of Object.entries(matchMap)) {
      if (line.substring(i, i + key.length) == key) {
        first = value;
        break forward;
      }
    }
  }

  backward: for (let j = line.length - 1; j >= 0; j--) {
    for (const [key, value] of Object.entries(matchMap)) {
      if (line.substring(j, j + key.length) == key) {
        last = value;
        break backward;
      }
    }
  }

  console.log(first, last);

  part2 += parseInt(`${first}${last}`, 10);
}

console.log(part2);
