/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package selenium_new;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author MINH TOAN
 */
public class capnhat_5 {
     static WebDriver driver;
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            Thread.sleep(1000);
            driver.findElement(By.linkText("Đăng Nhập")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("login_username")).sendKeys("toan123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login_password")).sendKeys("123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login")).click();
            Thread.sleep(1000);
            driver.findElement(By.id("toggle_option-user")).click();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Thông tin")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("user_numberphone")).clear();
            driver.findElement(By.name("user_numberphone")).sendKeys("938107521");
            Thread.sleep(1000);
            driver.findElement(By.name("change-info")).click();
        }
}
