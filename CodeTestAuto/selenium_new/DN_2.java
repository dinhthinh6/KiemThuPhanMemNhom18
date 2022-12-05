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
public class DN_2 {
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
            WebElement tk = driver.findElement(By.name("login_username"));
            tk.sendKeys("toan");
            Thread.sleep(1000);
            WebElement mk = driver.findElement(By.name("login_password"));
            mk.sendKeys("123");
            Thread.sleep(1000);
            driver.findElement(By.name("login")).click();
            if(driver.findElement(By.id("toggle_option-user")).isDisplayed()){
                System.out.println("pass");
            }
            else{
                System.out.println("fail");
            }
            
            driver.quit();
          
    }
}