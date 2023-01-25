from selenium.webdriver.common.by import By
import time

from selenium import webdriver
from selenium.webdriver.common.keys import Keys


def first_test():
    options = webdriver.ChromeOptions()
    options.add_experimental_option("excludeSwitches", ["enable-logging"])
    driver = webdriver.Chrome(options=options, executable_path=r'C:\Users\kayaba\Desktop\кну\МПТПО\chromedriver.exe')
    driver.get("http://localhost/projekt/")

    
    # Поиск и проверка попадания в регистрацию
    reg_button = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/div/a')
    reg_button.send_keys(Keys.RETURN)
    
    #Заполнение формы регистрации
    reg_login = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/form/div[1]/input')
    reg_pass = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/form/div[2]/input')
    reg_pass2 = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/form/div[3]/input')
    reg_email = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/form/div[4]/input')

    reg_submit = driver.find_element('xpath','/html/body/div/div/div/div/div[2]/form/div[5]/button')

    reg_login.send_keys('userselenium')
    reg_pass.send_keys('userpassword')
    reg_pass2.send_keys('userpassword')
    reg_email.send_keys('user_selenium@gmail.com')
    

    time.sleep(1)
    reg_submit.send_keys(Keys.RETURN)

    print("Успешная регистрация !")
    
    time.sleep(1)
    
    title_text0_1 = driver.find_element('xpath', '/html/body/div/div/div/div/div[4]/p')

    if title_text0_1.text == "Success!" or title_text0_1.text == "Login is busy!":
    
        driver.get("http://localhost/projekt/")
        # Поиск элементов и присваивание к переменным.
        input_username = driver.find_element('xpath', '/html/body/div/div/div/div/div[2]/form/div[1]/input')
        input_password = driver.find_element('xpath', '/html/body/div/div/div/div/div[2]/form/div[2]/input')
        login_button = driver.find_element('xpath', '/html/body/div/div/div/div/div[2]/form/div[3]/button')

        # Действия с формами
        input_username.send_keys("userselenium")
        input_password.send_keys("userpassword")
        time.sleep(1)
        login_button.send_keys(Keys.RETURN)

        # Поиск и проверка попадания на главную страницу
        title_text = driver.find_element('xpath', '/html/body/div/div[2]/div/div[2]/div/div[1]/span/a')
        if title_text.text == "Your login: userselenium":
            print("Мы попали на главную страницу !")

            print("Наберем текстовое сообщение в чат !")
            
            input_chat1_1 = driver.find_element('xpath', '/html/body/div/div[2]/div/div[3]/form/div/input')
            input_chat1_1.send_keys("Текстовое сообщение")
            time.sleep(1)
            login_button1_1 = driver.find_element('xpath','/html/body/div/div[2]/div/div[3]/form/div/button')
            login_button1_1.send_keys(Keys.RETURN)

            time.sleep(1)


            # Поиск и проверка попадания в профиль
            login_button2 = driver.find_element('xpath','/html/body/div/div[1]/div/div/span[1]/a')
            login_button2.send_keys(Keys.RETURN)

            title_text2 = driver.find_element('xpath', '/html/body/div/div[2]/div/div[1]')
            if title_text2.text == "PROFILE":
                print("Мы попали в профиль !")
                time.sleep(1)

            # Поиск и проврка попадания в список людей
            login_button3 = driver.find_element('xpath','/html/body/div/div[1]/div/div/span[3]/a')
            login_button3.send_keys(Keys.RETURN)

            title_text3 = driver.find_element('xpath', '/html/body/div/div[3]/div/div[1]')
            if title_text3.text == "ALL REGISTERED":
                print("Мы попали в список людей !")
                time.sleep(1)

                # Поиск и проверка попадания в чат личных сообщений
                login_button4 = driver.find_element('xpath','/html/body/div/div[3]/div/div[2]/div/div[3]/span/a')
                login_button4.send_keys(Keys.RETURN)

                title_text4 = driver.find_element('xpath', '/html/body/div/div[2]/div/div[2]/div/div[3]/span')
                if title_text4.text == "to id: 1":
                    print("Мы личные сообщения !")

                    print("Наберем текстовое сообщение в чат !")
            
                    input_chat4_1 = driver.find_element('xpath', '/html/body/div/div[2]/div/div[3]/form/div/input')
                    input_chat4_1.send_keys("Текстовое сообщение в личных сообщениях")
                    time.sleep(1)
                    login_button4_1 = driver.find_element('xpath','/html/body/div/div[2]/div/div[3]/form/div/button')
                    login_button4_1.send_keys(Keys.RETURN)
                    time.sleep(1)


    else:
        print("Ошибка поиска элемента")


    time.sleep(2)

if __name__ == '__main__':
    first_test()


