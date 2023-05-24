# Codigo para calcular o fatorial de um número

numero = int(input("Digite aqui um número para calcular seu fatorial:"))
if numero > 0:
    fatorial = 1
    for item in range(1, numero +1):
        fatorial = fatorial*item
    print(fatorial)