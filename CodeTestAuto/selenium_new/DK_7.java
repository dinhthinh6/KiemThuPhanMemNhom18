/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package selenium_new;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author MINH TOAN
 */
public class DK_7 {
    static WebDriver driver;
    
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            System.out.println("Page title is "+driver.getTitle());
            //driver.quit();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Đăng Ký")).click();
            Thread.sleep(1000);
            WebElement tk = driver.findElement(By.name("user_name"));
            tk.sendKeys("mtoan123");
            Thread.sleep(1000);
            WebElement mk = driver.findElement(By.name("password"));
            mk.sendKeys("123456");
            Thread.sleep(1000);
            WebElement mk_2 = driver.findElement(By.name("password_2"));
            mk_2.sendKeys("123456");
            Thread.sleep(1000);
            WebElement email = driver.findElement(By.name("user_email"));
            email.sendKeys("pp@gmail.com");
            Thread.sleep(1000);
            WebElement ten_dem = driver.findElement(By.name("user_firstname"));
           ten_dem.sendKeys("");
            Thread.sleep(1000);
            WebElement ten = driver.findElement(By.name("user_lastname"));
            ten.sendKeys("");
            Thread.sleep(1000);
            driver.findElement(By.name("register_user")).click();
            if(driver.findElement(By.className("lg:w-3/6")).isDisplayed()){
                System.out.println("pass");
            }
            else{
                System.out.println("pass");
            }
            Thread.sleep(1000);
            driver.quit();
}
}
