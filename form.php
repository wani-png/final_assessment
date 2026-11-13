<style>
    label {
        display: inline-block;
        width: 15%;
    }
</style>

<form method="post">
    <label form="">Student Name: </label>
    <input type="text" name="student_name" value="<?php echo $student_name; ?>">
    <br> <br>
    <label form="">Matric Number: </label>
    <input type="text" name="matric_no" value="<?php echo $matric_no; ?>">
    <br> <br>
    <label form="">Subject Name: </label>
    <input type="text" name="subject_name" value="<?php echo $subject_name; ?>">
    <br> <br>
    <label form="">Subject Code: </label>
    <input type="text" name="subject_code" value="<?php echo $subject_code; ?>">
    <br> <br>
    <label form="">Test 1 (20%): </label>
    <input type="text" name="test1" value="<?php echo $test1; ?>">
    <label for="">out of 20 </label>
    <br> <br>
    <label form="">Test 2 (30%): </label>
    <input type="text" name="test2" value="<?php echo $test2; ?>">
    <label for="">out of 30 </label>
    <br> <br>
    <label form="">Final Examinaion (50%): </label>
    <input type="text" name="final_exam" value="<?php echo $final_exam; ?>">
    <label for="">out of 50 </label>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>