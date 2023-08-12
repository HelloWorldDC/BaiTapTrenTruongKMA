from math import fabs as fabs
from math import floor as floor
from math import sqrt as sqrt
from scipy.special import erfc as erfc
from scipy.special import gammaincc as gammaincc
import Frequency

# Frequency Test within a Block

def block_frequency(binary_data,block_size=128):
    """
    The focus of the test is the proportion of ones within M-bit blocks.
    The purpose of this test is to determine whether the frequency of ones in an M-bit block is approximately M/2,
    as would be expected under an assumption of randomness.
    For block size M=1, this test degenerates to test 1, the Frequency (Monobit) test.

    :param      binary_data:        The length of each block
    :param      block_size:         The seuqnce of bit being tested
    :param      verbose             True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool)     A tuple which contain the p_value and result of frequency_test(True or False)
    """

    length_of_bit_string = len(binary_data)


    if length_of_bit_string < block_size:
        block_size = length_of_bit_string

    # Compute the number of blocks based on the input given.  Discard the remainder
    number_of_blocks = floor(length_of_bit_string / block_size)

    if number_of_blocks == 1:
        # For block size M=1, this test degenerates to test 1, the Frequency (Monobit) test.
        return Frequency.monobit_test(binary_data[0:block_size])

    # Initialized variables
    block_start = 0
    block_end = block_size
    proportion_sum = 0.0

    # Create a for loop to process each block
    for counter in range(number_of_blocks):
        # Partition the input sequence and get the data for block
        block_data = binary_data[block_start:block_end]

        # Determine the proportion 蟺i of ones in each M-bit
        one_count = 0
        for bit in block_data:
            if bit == '1':
                one_count += 1
        # compute π
        pi = one_count / block_size

        # Compute Σ(πi -½)^2.
        proportion_sum += pow(pi - 0.5, 2.0)

        # Next Block
        block_start += block_size
        block_end += block_size

    # Compute 4M Σ(πi -½)^2.
    result = 4.0 * block_size * proportion_sum

    # Compute P-Value
    p_value = gammaincc(number_of_blocks / 2, result / 2)
    return p_value

print(block_frequency("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))

# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_BlockFrequency_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_BlockFrequency_Test_Original_AES.txt", "a",encoding='utf-8')

getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    file_result.write(str(block_frequency(getdata)))
    file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()