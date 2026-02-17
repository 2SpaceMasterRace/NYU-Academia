TASK 1:
We're going to write a program which implements a very simple (almost useless) cypher algorithm.  The algorithm works by adding the number 13 to every letter and (with wrapping so that 'Z'+1='A') will result in a new letter.  Numbers are increased by 5 with wrapping so they remain just one digit. Other characters are left untouched.

Your code must meet the following restrictions

1) DONE!

2) The output will be the encoding of the input file.  For our purposes the algorithm is defined as follows:
    A) If the input is a lower case letter, the output is the lower case letter plus 13 (with wrap-around, so 'n' becomes 'a')
    B) If the input is a upper case letter, the output is the upper case letter plus 13 (with wrap-around, so 'n' becomes 'a')
    C) If the input is a number the output is the number plus 5 (with wrap-around so '6' becomes '1')
    D) If the input is neither letter nor number, the output is the same as the input ('!' becomes '!' and ' ' becomes ' ')

3) If I execute the following (assumes 1.txt is a valid text file):
    "php myprog.php 1 1.txt 2.txt"
    "php myprog.php 1 2.txt 3.txt"
   Then 1.txt and 3.txt will have the exact same information

4) For this task, you may not use the str_rot13 function (that would be a little to easy).  You may define your own functions, but you do not have to.

