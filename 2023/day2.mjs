import { open } from 'node:fs/promises';
const file = await open('./day2example.txt');

for await (const line of file.readLines()) {
  let red, green, blue = 0;
  const [game, moves] = line.split(':');

  for (const move of moves.split(';')) {
    for (const cubes of move.split(',')) {
      console.log(cubes);
    }
  }
}
