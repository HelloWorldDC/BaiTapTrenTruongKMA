from math import fabs as fabs
from math import floor as floor
from math import sqrt as sqrt
from scipy.special import erfc as erfc
from scipy.special import gammaincc as gammaincc

# Frequency (Monobit) Test

def monobit_test(binary_data):
    """
    The focus of the test is the proportion of zeroes and ones for the entire sequence.
    The purpose of this test is to determine whether the number of ones and zeros in a sequence are approximately
    the same as would be expected for a truly random sequence. The test assesses the closeness of the fraction of
    ones to 陆, that is, the number of ones and zeroes in a sequence should be about the same.
    All subsequent tests depend on the passing of this test.

    if p_value < 0.01, then conclude that the sequence is non-random (return False).
    Otherwise, conclude that the the sequence is random (return True).

    :param      binary_data         The seuqnce of bit being tested
    :param      verbose             True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool)     A tuple which contain the p_value and result of frequency_test(True or False)

    """

    length_of_bit_string = len(binary_data)

    # Variable for S(n)
    count = 0
    # Iterate each bit in the string and compute for S(n)
    for bit in binary_data:
        if bit == '0':
            # If bit is 0, then -1 from the S(n)
            count -= 1
        elif bit == '1':
            # If bit is 1, then +1 to the S(n)
            count += 1

    # Compute the test statistic
    sObs = count / sqrt(length_of_bit_string)

    # Compute p-Value
    p_value = erfc(fabs(sObs) / sqrt(2))
    return p_value
# print(monobit_test("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))
# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_Frequency_Test.txt", "a",encoding='utf-8')
# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_Frequency_Test_Original_AES.txt", "a",encoding='utf-8')

# getdata=fileData.readline()
# while(getdata!=""):
#     getdata=getdata.rstrip()
#     file_result.write(str(monobit_test(getdata)))
#     file_result.write("\n")
#     getdata=fileData.readline()

# fileData.close()
# file_result.close()