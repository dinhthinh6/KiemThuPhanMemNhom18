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
public class QLTK_2 {
    static WebDriver driver;
    
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            System.out.println("Page title is "+driver.getTitle());
            //driver.quit();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Đăng Nhập")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("login_username")).sendKeys("toan123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login_password")).sendKeys("123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login")).click();
            driver.findElement(By.linkText("Admin")).click();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Người Dùng")).click();
            Thread.sleep(1000);
            driver.findElement(By.className("fa-pen-to-square")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("user_numberphone")).clear();
            driver.findElement(By.name("user_numberphone")).sendKeys("123asd");
            Thread.sleep(1000);
            driver.findElement(By.name("edit_user")).click();
            Thread.sleep(500);
            driver.quit();
        
        }
}
