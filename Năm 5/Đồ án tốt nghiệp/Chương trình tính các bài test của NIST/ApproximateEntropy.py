from math import log as log
from numpy import zeros as zeros
from scipy.special import gammaincc as gammaincc

# Approximate Entropy Test

def approximate_entropy_test(binary_data, pattern_length=1):
    """
    from the NIST documentation http://csrc.nist.gov/publications/nistpubs/800-22-rev1a/SP800-22rev1a.pdf

    As with the Serial test of Section 2.11, the focus of this test is the frequency of all possible
    overlapping m-bit patterns across the entire sequence. The purpose of the test is to compare
    the frequency of overlapping blocks of two consecutive/adjacent lengths (m and m+1) against the
    expected result for a random sequence.

    :param      binary_data:        a binary string
    :param      verbose             True to display the debug message, False to turn off debug message
    :param      pattern_length:     the length of the pattern (m)
    :return:    ((p_value1, bool), (p_value2, bool)) A tuple which contain the p_value and result of serial_test(True or False)
    """
    length_of_binary_data = len(binary_data)

    # Augment the n-bit sequence to create n overlapping m-bit sequences by appending m-1 bits
    # from the beginning of the sequence to the end of the sequence.
    # NOTE: documentation says m-1 bits but that doesnt make sense, or work.
    binary_data += binary_data[:pattern_length - 1:]

    # Get max length one patterns for m, m-1, m-2
    max_pattern = ''
    for i in range(pattern_length + 2):
        max_pattern += '1'

    # Keep track of each pattern's frequency (how often it appears)
    vobs_01 = zeros(int(max_pattern[0:pattern_length:], 2) + 1)
    vobs_02 = zeros(int(max_pattern[0:pattern_length + 1:], 2) + 1)

    for i in range(length_of_binary_data):
        # Work out what pattern is observed
        vobs_01[int(binary_data[i:i + pattern_length:], 2)] += 1
        vobs_02[int(binary_data[i:i + pattern_length + 1:], 2)] += 1

    # Calculate the test statistics and p values
    vobs = [vobs_01, vobs_02]

    sums = zeros(2)
    for i in range(2):
        for j in range(len(vobs[i])):
            if vobs[i][j] > 0:
                sums[i] += vobs[i][j] * log(vobs[i][j] / length_of_binary_data)
    sums /= length_of_binary_data
    ape = sums[0] - sums[1]

    xObs = 2.0 * length_of_binary_data * (log(2) - ape)

    p_value = gammaincc(pow(2, pattern_length - 1), xObs / 2.0)
    return p_value

print(approximate_entropy_test("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))

# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_ApproximateEntropy_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_ApproximateEntropy_Test_Original_AES.txt", "a",encoding='utf-8')
getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    file_result.write(str(approximate_entropy_test(getdata)))
    file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()