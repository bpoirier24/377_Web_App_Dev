file_path = 'day2.txt' 

with open(file_path, 'r') as file:
    lines = file.readlines()

total_power = 0

for line in lines:
    if line.startswith('Game'):
        continue 

    game_min_cubes = {'red': float('inf'), 'green': float('inf'), 'blue': float('inf')}
    rounds = line.split(';')

    for round_data in rounds:
        count, color = [entry.strip() for entry in round_data.split(' ', 1)]

        count = int(count)
        if count < game_min_cubes[color]:
            game_min_cubes[color] = count

    game_power = game_min_cubes['red'] * game_min_cubes['green'] * game_min_cubes['blue']
    total_power += game_power

print("Sum of the power of minimum sets:", total_power)
