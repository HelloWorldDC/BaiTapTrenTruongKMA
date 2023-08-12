from numpy import zeros as zeros
from scipy.special import gammaincc as gammaincc

# Serial Test

def serial_test(binary_data, pattern_length=4):
    """
    From the NIST documentation http://csrc.nist.gov/publications/nistpubs/800-22-rev1a/SP800-22rev1a.pdf

    The focus of this test is the frequency of all possible overlapping m-bit patterns across the entire
    sequence. The purpose of this test is to determine whether the number of occurrences of the 2m m-bit
    overlapping patterns is approximately the same as would be expected for a random sequence. Random
    sequences have uniformity; that is, every m-bit pattern has the same chance of appearing as every other
    m-bit pattern. Note that for m = 1, the Serial test is equivalent to the Frequency test of Section 2.1.

    :param      binary_data:        a binary string
    :param      verbose             True to display the debug message, False to turn off debug message
    :param      pattern_length:     the length of the pattern (m)
    :return:    ((p_value1, bool), (p_value2, bool)) A tuple which contain the p_value and result of serial_test(True or False)
    """
    length_of_binary_data = len(binary_data)
    binary_data += binary_data[:(pattern_length -1):]

    # Get max length one patterns for m, m-1, m-2
    max_pattern = ''
    for i in range(pattern_length + 1):
        max_pattern += '1'

    # Step 02: Determine the frequency of all possible overlapping m-bit blocks,
    # all possible overlapping (m-1)-bit blocks and
    # all possible overlapping (m-2)-bit blocks.
    vobs_01 = zeros(int(max_pattern[0:pattern_length:], 2) + 1)
    vobs_02 = zeros(int(max_pattern[0:pattern_length - 1:], 2) + 1)
    vobs_03 = zeros(int(max_pattern[0:pattern_length - 2:], 2) + 1)

    for i in range(length_of_binary_data):
        # Work out what pattern is observed
        vobs_01[int(binary_data[i:i + pattern_length:], 2)] += 1
        vobs_02[int(binary_data[i:i + pattern_length - 1:], 2)] += 1
        vobs_03[int(binary_data[i:i + pattern_length - 2:], 2)] += 1

    vobs = [vobs_01, vobs_02, vobs_03]

    # Step 03 Compute for ψs
    sums = zeros(3)
    for i in range(3):
        for j in range(len(vobs[i])):
            sums[i] += pow(vobs[i][j], 2)
        sums[i] = (sums[i] * pow(2, pattern_length - i) / length_of_binary_data) - length_of_binary_data

    # Cimpute the test statistics and p values
    #Step 04 Compute for ∇
    nabla_01 = sums[0] - sums[1]
    nabla_02 = sums[0] - 2.0 * sums[1] + sums[2]

    # Step 05 Compute for P-Value
    p_value_01 = gammaincc(pow(2, pattern_length - 1) / 2, nabla_01 / 2.0)
    p_value_02 = gammaincc(pow(2, pattern_length - 2) / 2, nabla_02 / 2.0)
    return p_value_01, p_value_02


a=serial_test("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100")
print(a)
print(a[0])
print(a[1])

# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_Serial_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_Serial_Test_Original_AES.txt", "a",encoding='utf-8')
getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    get_result=serial_test(getdata)
    if (get_result[0] >= 0.01) and (get_result[1] >= 0.01):
        file_result.write("Random")
        file_result.write("\n")
    else:
        file_result.write("Non-random")
        file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()