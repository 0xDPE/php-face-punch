from socket import gethostbyname, gethostname
from os import system


def main():
	system(f"php -S {gethostbyname(gethostname())}:8080")


if __name__ == "__main__":
	main()
