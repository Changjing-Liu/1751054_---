<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>方便面用户调查</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // 定义变量并默认设置为空值
    $genderErr = $ageErr = $typeErr = $priceErr = $factorErr = "";
    $gender = $age = $comment = $type = $price = $factor = "";
    $result = 0;
    $url = "main.html";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["gender"])) {
            $genderErr = "性别是必需的";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["age"])) {
            $ageErr = "年龄是必需的";
        } else {
            $age = test_input($_POST["age"]);
        }

        if (empty($_POST["type"])) {
            $typeErr = "需要选择一款方便面";
        } else {
            $type = test_input($_POST["type"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["price"])) {
            $priceErr = "需要选择一个价格区间";
        } else {
            $price = test_input($_POST["price"]);
        }

        if (empty($_POST["factor"])) {
            $factorErr = "需要选择一个因素";
        } else {
            $factor = test_input($_POST["factor"]);
        }
        if (!empty($_POST["gender"]) && !empty($_POST["age"]) && !empty($_POST["type"]) && !empty($_POST["factor"])) {
            $result = 1;
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>方便面产品的用户调查</h2>
    <p><span class="error">* 必需字段。</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        性别:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">女
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">男
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        年龄:
        <input type="radio" name="age" <?php if (isset($age) && $age == "1") echo "checked"; ?> value="1">18岁以下
        <input type="radio" name="age" <?php if (isset($age) && $age == "2") echo "checked"; ?> value="2">18-25岁
        <input type="radio" name="age" <?php if (isset($age) && $age == "3") echo "checked"; ?> value="3">25-35岁
        <input type="radio" name="age" <?php if (isset($age) && $age == "4") echo "checked"; ?> value="4">45-55岁
        <input type="radio" name="age" <?php if (isset($age) && $age == "5") echo "checked"; ?> value="5">55岁以上
        <span class="error">* <?php echo $ageErr; ?></span>
        <br><br>
        您最喜爱的方便面品牌:
        <select name="type">
            <option value="">请选择泡面品牌:</option>
            <option <?php if (isset($type) && $type == "kangshifu") echo "selected"; ?> value="kangshifu">康师傅</option>
            <option <?php if (isset($type) && $type == "tongyi") echo "selected"; ?> value="tongyi">统一</option>
            <option <?php if (isset($type) && $type == "jinmailang") echo "selected"; ?> value="jinmailang">今麦郎</option>
            <option <?php if (isset($type) && $type == "nissin") echo "selected"; ?> value="nissin">日清</option>
            <option <?php if (isset($type) && $type == "baixiang") echo "selected"; ?> value="baixiang">白象</option>
            <option <?php if (isset($type) && $type == "nongshim") echo "selected"; ?> value="nongshim">农心</option>
            <option <?php if (isset($type) && $type == "gongzai") echo "selected"; ?> value="gongzai">公仔面</option>
            <option <?php if (isset($type) && $type == "wugudaochang") echo "selected"; ?> value="wugudaochang">五谷道场</option>
            <option <?php if (isset($type) && $type == "yumyum") echo "selected"; ?> value="yumyum">养养</option>
            <option <?php if (isset($type) && $type == "koka") echo "selected"; ?> value="koka">KOKA</option>
            <option <?php if (isset($type) && $type == "sedaap") echo "selected"; ?> value="sedaap">喜达牌</option>
            <option <?php if (isset($type) && $type == "else") echo "selected"; ?> value="else">其他品牌</option>
        </select>
        <span class="error">* <?php echo $typeErr; ?></span>
        <br><br>
        您一般选择方便面的价格：
        <input type="radio" name="price" <?php if (isset($price) && $price == "1") echo "checked"; ?> value="1">1-3元
        <input type="radio" name="price" <?php if (isset($price) && $price == "2") echo "checked"; ?> value="2">3-5元
        <input type="radio" name="price" <?php if (isset($price) && $price == "3") echo "checked"; ?> value="3">5-8元
        <input type="radio" name="price" <?php if (isset($price) && $price == "4") echo "checked"; ?> value="4">8元以上
        <span class="error">* <?php echo $priceErr; ?></span>
        <br><br>
        影响你购买方便面的主要因素是：
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "1") echo "checked"; ?> value="1">口味
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "2") echo "checked"; ?> value="2">营养性
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "3") echo "checked"; ?> value="3">品牌
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "4") echo "checked"; ?> value="4">价格
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "5") echo "checked"; ?> value="5">包装
        <input type="radio" name="factor" <?php if (isset($factor) && $factor == "6") echo "checked"; ?> value="6">广告
        <span class="error">* <?php echo $priceErr; ?></span>
        <br><br>
        您对方便面产品有什么建议和意见:
        <br><br>
        <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        <input type="submit" name="submit" value="提交">
    </form>

    <?php
    if ($result == 1) {
        echo '<script>alert("提交成功！正在返回主页");location.href="' . $url . '"</script>'; //回到主页
    }
    ?>

</body>

</html>