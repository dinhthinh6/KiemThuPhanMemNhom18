/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package selenium_new;

import static java.awt.PageAttributes.MediaType.B;
import static java.lang.Thread.sleep;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class Selenium_new {

    static WebDriver driver;
    
    public static void main(String[] args) throws InterruptedException {
        System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
        driver=new ChromeDriver();
        driver.get("http://localhost:8080/ecommerce/customers/index.php");
        System.out.println("Page title is "+driver.getTitle());
        //driver.quit();
        Thread.sleep(500);
        driver.findElement(By.linkText("Đăng Nhập")).click();
        Thread.sleep(500);
        WebElement tk= driver.findElement(By.name("login_username"));
        tk.sendKeys("toan");
        Thread.sleep(500);
        WebElement mk = driver.findElement(By.name("login_password"));
        mk.sendKeys("123333");
        driver.findElement(By.name("login")).click();
        if(driver.findElement(By.className("lg:w-3/6")).isDisplayed()){
            System.out.println("fail");
        }
        else{
             System.out.println("pass");
        }
              
        //driver.findElements(By.linkText("Blog")).click();
    }
    
}
