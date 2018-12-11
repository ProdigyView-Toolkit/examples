# ProdigyView Toolkit Examples

Welcome to the ProdigyView Toolkit Examples! These are examples that will show you how to use the tool. It is supplemental to other online resources that include:

1. The Blog: https://medium.com/helium-mvc
2. Documentation: https://prodigyview-toolkit.github.io/docs/
3. Well Documented Code: https://github.com/ProdigyView-Toolkit/prodigyview
4. MVC Created Using The Toolkit: https://github.com/Helium-MVC/Helium

### Installing And Running The Examples

The example code comes with Docker to make playing with the code and resources relatively. To get started:

##### 1. Download Docker
If you have not already, please download Docker at https://www.docker.com/. Docker virtualizes any environment for the code to run.

##### 2. Clone The Repo
After Docker is installed, clone the repo to your computer with git. You can accomplish this by running:

```bash
git clone https://github.com/ProdigyView-Toolkit/examples /path/on/your/local/
```

##### 3. Setup Your Hosts File
For our examples, we use the example domain www.pvexamples.com on your localhost. Copy and paste the following in your /etc/hosts file:
> 127.0.01	www.pvexamples.com

##### 4. Run Docker
Now that the repo is cloned, we are going to start it up with the following:
cd /path/on/your/local/
docker-compose up

##### 5. Install Libraries with Composer 
The final step is to install the via composer. If you do not have composer installed on your computer, we can ssh into docker and install them. Run the following on your command line:
```bash
docker exec -it pv_php bash
cd /code
composer install
```

### Accessing The Examples
And you are done! Navigate to http://www.pvexamples.com, and you can start to play around with the examples given in this repo. Happy coding!

