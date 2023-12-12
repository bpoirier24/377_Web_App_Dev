def ways_to_beat_record(time, distance):
    ways = 0

    for hold_time in range(time + 1):
        boat_speed = hold_time
        travel_time = time - hold_time
        total_distance = (boat_speed * travel_time) 

        if total_distance > distance:
            ways += 1

    return ways

times = [58819676] 
distances = [434104122191218]
# times = [7,15,30]
# distances = [9,40,200]
total_ways = 1

for i in range(len(times)):
    ways = ways_to_beat_record(times[i], distances[i])
    print (ways)
    total_ways *= ways

print("Total number of ways to beat the records:", total_ways)
