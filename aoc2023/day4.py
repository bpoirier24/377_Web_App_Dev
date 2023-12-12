def read_cards_from_file(file_path):
    with open(file_path, 'r') as file:
        lines = file.readlines()
    return lines

def extract_numbers(card_str):

    numeric_strings = filter(str.isdigit, card_str.replace('Card', '').replace(':', '').split())
    

    return set(map(int, numeric_strings))

def calculate_points(common_numbers):
    return len(common_numbers)

def find_common_numbers(cards):
    num_cards = len(cards)
    total_points = 0
    
    for i in range(num_cards):
        for j in range(i + 1, num_cards):
            card_i = extract_numbers(cards[i])
            card_j = extract_numbers(cards[j])
            common_numbers = card_i.intersection(card_j)
            
            points = calculate_points(common_numbers)
            total_points += points
            
            print(f"Common numbers between Card {i + 1} and Card {j + 1}: {common_numbers}")
            print(f"Points for this pair: {points}\n")

    print(f"Total points: {total_points}")

if __name__ == "__main__":
    file_path = "day4.py" 
    cards = read_cards_from_file(file_path)
    find_common_numbers(cards)
