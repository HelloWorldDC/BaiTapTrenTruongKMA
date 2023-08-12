from math import fabs as fabs
from math import floor as floor
from math import sqrt as sqrt
from scipy.special import erfc as erfc
from scipy.special import gammaincc as gammaincc
# from scipy import zeros as zeros
import numpy

# Test for the Longest Run of Ones in a Block 

def longest_one_block_test(binary_data):
    """
    The focus of the test is the longest run of ones within M-bit blocks. The purpose of this test is to determine
    whether the length of the longest run of ones within the tested sequence is consistent with the length of the
    longest run of ones that would be expected in a random sequence. Note that an irregularity in the expected
    length of the longest run of ones implies that there is also an irregularity in the expected length of the
    longest run of zeroes. Therefore, only a test for ones is necessary.

    :param      binary_data:        The sequence of bits being tested
    :param      verbose             True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool)     A tuple which contain the p_value and result of frequency_test(True or False)
    """
    length_of_binary_data = len(binary_data)
    # print('Length of binary string: ', length_of_binary_data)

    # Initialized k, m. n, pi and v_values
    if length_of_binary_data < 128:
        # Not enough data to run this test
        return (0.00000, False, 'Error: Not enough data to run this test')
    elif length_of_binary_data < 6272:
        k = 3
        m = 8
        v_values = [1, 2, 3, 4]
        pi_values = [0.2148, 0.3672, 0.2305, 0.1875]
    elif length_of_binary_data < 750000:
        k = 5
        m = 128
        v_values = [4, 5, 6, 7, 8, 9]
        pi_values = [0.1174, 0.2430, 0.2493, 0.1752, 0.1027, 0.1124]
    else:
        # If length_of_bit_string > 750000
        k = 6
        m = 10000
        v_values = [10, 11, 12, 13, 14, 15, 16]
        pi_values = [0.0882, 0.2092, 0.2483, 0.1933, 0.1208, 0.0675, 0.0727]

    number_of_blocks = floor(length_of_binary_data / m)
    block_start = 0
    block_end = m
    xObs = 0
    # This will intialized an array with a number of 0 you specified.
    #frequencies = zeros(k + 1) # DeprecationWarning: scipy.zeros is deprecated and will be removed in SciPy 2.0.0, use numpy.zeros instead frequencies = zeros(k + 1)
    frequencies = numpy.zeros(k + 1)
    # print('Number of Blocks: ', number_of_blocks)

    for count in range(number_of_blocks):
        block_data = binary_data[block_start:block_end]
        max_run_count = 0
        run_count = 0

        # This will count the number of ones in the block
        for bit in block_data:
            if bit == '1':
                run_count += 1
                max_run_count = max(max_run_count, run_count)
            else:
                max_run_count = max(max_run_count, run_count)
                run_count = 0

        max(max_run_count, run_count)

        #print('Block Data: ', block_data, '. Run Count: ', max_run_count)

        if max_run_count < v_values[0]:
            frequencies[0] += 1
        for j in range(k):
            if max_run_count == v_values[j]:
                frequencies[j] += 1
        if max_run_count > v_values[k - 1]:
            frequencies[k] += 1

        block_start += m
        block_end += m

    # print("Frequencies: ", frequencies)
    # Compute xObs
    for count in range(len(frequencies)):
        xObs += pow((frequencies[count] - (number_of_blocks * pi_values[count])), 2.0) / (
                number_of_blocks * pi_values[count])

    p_value = gammaincc(float(k / 2), float(xObs / 2))
    return p_value

print(longest_one_block_test("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))
# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_LongestRun_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_LongestRun_Test_Original_AES.txt", "a",encoding='utf-8')
getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    file_result.write(str(longest_one_block_test(getdata)))
    file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()