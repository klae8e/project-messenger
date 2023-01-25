import time
from locust import HttpUser, task, between

class QuickstartUser(HttpUser):
   wait_time = between(1, 5)

   @task
   def on_start(self):
      self.client.post("index.php", json={"login":"duck", "pass":"duck"})

   @task
   def mainpage(self):
      self.client.get(url="mainpage.php")

   @task
   def profile(self):
      self.client.get(url="profile.php")

   @task
   def friends(self):
      self.client.get(url="friends.php")
      
      
   