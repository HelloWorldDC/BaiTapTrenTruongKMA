from numpy import abs as abs
from numpy import array as array
from numpy import floor as floor
from numpy import max as max
from numpy import sqrt as sqrt
from numpy import sum as sum
from numpy import zeros as zeros
from scipy.stats import norm as norm

# Cumulative Sums (Cusum) Test

def cumulative_sums_test_forward(binary_data, mode=0):
    """
    from the NIST documentation http://csrc.nist.gov/publications/nistpubs/800-22-rev1a/SP800-22rev1a.pdf

    The focus of this test is the maximal excursion (from zero) of the random walk defined by the cumulative sum of
    adjusted (-1, +1) digits in the sequence. The purpose of the test is to determine whether the cumulative sum of
    the partial sequences occurring in the tested sequence is too large or too small relative to the expected
    behavior of that cumulative sum for random sequences. This cumulative sum may be considered as a random walk.
    For a random sequence, the excursions of the random walk should be near zero. For certain types of non-random
    sequences, the excursions of this random walk from zero will be large.

    :param      binary_data:    a binary string
    :param      mode            A switch for applying the test either forward through the input sequence (mode = 0)
                                or backward through the sequence (mode = 1).
    :param      verbose         True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool) A tuple which contain the p_value and result of frequency_test(True or False)

    """

    length_of_binary_data = len(binary_data)
    counts = zeros(length_of_binary_data)

    # Determine whether forward or backward data
    if not mode == 0:
        binary_data = binary_data[::-1]

    counter = 0
    for char in binary_data:
        sub = 1
        if char == '0':
            sub = -1
        if counter > 0:
            counts[counter] = counts[counter -1] + sub
        else:
            counts[counter] = sub

        counter += 1
    # Compute the test statistic z =max1≤k≤n|Sk|, where max1≤k≤n|Sk| is the largest of the
    # absolute values of the partial sums Sk.
    abs_max = max(abs(counts))

    start = int(floor(0.25 * floor(-length_of_binary_data / abs_max) + 1))
    end = int(floor(0.25 * floor(length_of_binary_data / abs_max) - 1))

    terms_one = []
    for k in range(start, end + 1):
        sub = norm.cdf((4 * k - 1) * abs_max / sqrt(length_of_binary_data))
        terms_one.append(norm.cdf((4 * k + 1) * abs_max / sqrt(length_of_binary_data)) - sub)

    start = int(floor(0.25 * floor(-length_of_binary_data / abs_max - 3)))
    end = int(floor(0.25 * floor(length_of_binary_data / abs_max) - 1))

    terms_two = []
    for k in range(start, end + 1):
        sub = norm.cdf((4 * k + 1) * abs_max / sqrt(length_of_binary_data))
        terms_two.append(norm.cdf((4 * k + 3) * abs_max / sqrt(length_of_binary_data)) - sub)

    p_value = 1.0 - sum(array(terms_one))
    p_value += sum(array(terms_two))
    return p_value

def cumulative_sums_test_reverse(binary_data, mode=1):
    """
    from the NIST documentation http://csrc.nist.gov/publications/nistpubs/800-22-rev1a/SP800-22rev1a.pdf

    The focus of this test is the maximal excursion (from zero) of the random walk defined by the cumulative sum of
    adjusted (-1, +1) digits in the sequence. The purpose of the test is to determine whether the cumulative sum of
    the partial sequences occurring in the tested sequence is too large or too small relative to the expected
    behavior of that cumulative sum for random sequences. This cumulative sum may be considered as a random walk.
    For a random sequence, the excursions of the random walk should be near zero. For certain types of non-random
    sequences, the excursions of this random walk from zero will be large.

    :param      binary_data:    a binary string
    :param      mode            A switch for applying the test either forward through the input sequence (mode = 0)
                                or backward through the sequence (mode = 1).
    :param      verbose         True to display the debug messgae, False to turn off debug message
    :return:    (p_value, bool) A tuple which contain the p_value and result of frequency_test(True or False)

    """

    length_of_binary_data = len(binary_data)
    counts = zeros(length_of_binary_data)

    # Determine whether forward or backward data
    if not mode == 0:
        binary_data = binary_data[::-1]

    counter = 0
    for char in binary_data:
        sub = 1
        if char == '0':
            sub = -1
        if counter > 0:
            counts[counter] = counts[counter -1] + sub
        else:
            counts[counter] = sub

        counter += 1
    # Compute the test statistic z =max1≤k≤n|Sk|, where max1≤k≤n|Sk| is the largest of the
    # absolute values of the partial sums Sk.
    abs_max = max(abs(counts))

    start = int(floor(0.25 * floor(-length_of_binary_data / abs_max) + 1))
    end = int(floor(0.25 * floor(length_of_binary_data / abs_max) - 1))

    terms_one = []
    for k in range(start, end + 1):
        sub = norm.cdf((4 * k - 1) * abs_max / sqrt(length_of_binary_data))
        terms_one.append(norm.cdf((4 * k + 1) * abs_max / sqrt(length_of_binary_data)) - sub)

    start = int(floor(0.25 * floor(-length_of_binary_data / abs_max - 3)))
    end = int(floor(0.25 * floor(length_of_binary_data / abs_max) - 1))

    terms_two = []
    for k in range(start, end + 1):
        sub = norm.cdf((4 * k + 1) * abs_max / sqrt(length_of_binary_data))
        terms_two.append(norm.cdf((4 * k + 3) * abs_max / sqrt(length_of_binary_data)) - sub)

    p_value = 1.0 - sum(array(terms_one))
    p_value += sum(array(terms_two))
    return p_value


print(cumulative_sums_test_forward("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))
print(cumulative_sums_test_reverse("01001000011011110110001100100000011101100110100101100101011011100010000001001011010101000100110101001101010000010100001101010100"))

# fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Ciphertext_Proposed_AES_Case3(Bin).txt", "r",encoding='utf-8')
# file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Proposed AES\\Final\\Result_CumulativeSums_Test.txt", "a",encoding='utf-8')
fileData = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Ciphertext_Original_AES_Case3(Bin).txt", "r",encoding='utf-8')
file_result = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Result Test\\Result AES Randomness Test\\Original AES\\Final\\Result_CumulativeSums_Test_Original_AES.txt", "a",encoding='utf-8')

getdata=fileData.readline()
while(getdata!=""):
    getdata=getdata.rstrip()
    get_result_forward=cumulative_sums_test_forward(getdata)
    get_result_reverse=cumulative_sums_test_reverse(getdata)
    if (get_result_forward >= 0.01) | (get_result_reverse >= 0.01):
        file_result.write("Random")
        file_result.write("\n")
    else:
        file_result.write("Non-random")
        file_result.write("\n")
    getdata=fileData.readline()

fileData.close()
file_result.close()