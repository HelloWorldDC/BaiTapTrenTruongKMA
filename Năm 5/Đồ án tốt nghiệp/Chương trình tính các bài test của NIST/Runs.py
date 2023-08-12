from math import fabs as fabs
from math import floor as floor
from math import sqrt as sqrt
from scipy.special import erfc as erfc
from scipy.special import gammaincc as gammaincc

# Runs Test

def run_test(binary_data):
    """
    The focus of this test is the total number of runs in the sequence,
    where a run is an uninterrupted sequence of identical bits.
    A run of length k consists of exactly k identical bits and is bounded before
    and after with a bit of the opposite value. The purpose of the runs test is to
    determine whether the number of runs of ones and zeros of various lengths is as
    expected for a random sequence. In particular, this test determines whether the
    oscillation between such zeros and ones is too fast or too slow.

    :param      binary_data:        The seuqnce of bit being tested
    :param      verbose             True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool)     A tuple which contain the p_value and result of frequency_test(True or False)
    """
    one_count = 0
    vObs = 0
    length_of_binary_data = len(binary_data)

    # Predefined tau = 2 / sqrt(n)
    # TODO Confirm with Frank about the discrepancy between the formula and the sample of 2.3.8
    tau = 2 / sqrt(length_of_binary_data)

    # Step 1 - Compute the pre-test proportion πof ones in the input sequence: π = Σjεj / n
    one_count = binary_data.count('1')

    pi = one_count / length_of_binary_data

    # Step 2 - If it can be shown that absolute value of (π - 0.5) is greater than or equal to tau
    # then the run test need not be performed.
    if abs(pi - 0.5) >= tau:
        ##print("The test should not have been run because of a failure to pass test 1, the Frequency (Monobit) test.")
        return (0.0000, False)
    else:
        # Step 3 - Compute vObs
        for item in range(1, length_of_binary_data):
            if binary_data[item] != binary_data[item - 1]:
                vObs += 1
        vObs += 1

        # Step 4 - Compute p_value = erfc((|vObs − 2nπ * (1−π)|)/(2 * sqrt(2n) * π * (1−π)))
        p_value = erfc(abs(vObs - (2 * (length_of_binary_data) * pi * (1 - pi))) / (2 * sqrt(2 * length_of_binary_data) * pi * (1 - pi)))
    return p_value

print(run_test("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))

# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_Runs_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_Runs_Test_Original_AES.txt", "a",encoding='utf-8')

getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    file_result.write(str(run_test(getdata)))
    file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()