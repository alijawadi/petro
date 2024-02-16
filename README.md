## Hello There

I started by creating my docker containers, I have made 4 different containers and used them to develop this project.
Considering the details you've provided me, I decided to have a Domain Oriented approach being my innovative approach, as per your request.
I have created two layers on my application and made it observable in the application route/folders.

- App Layer
- Domain Layer

While my use of the word “domain” won't exactly have the same meaning as in
the DDD community, there are several similarities. If you're familiar with DDD,
you'll discover these similarities throughout this project.

I used DTOs for communication between the two layers, so we could have a sort of bounded context.


### Front End
I used Inertia and ReactJS to implement my frontend with Laravel. 
I believed it was best to utilize tools to enhance full-stack development. 
All the ReactJS components and files are located in [resources/js](src%2Fresources%2Fjs).

#### Last Word:
There were numerous issues that I considered but didn't have the time to address. Many best practices in front-end were overlooked. The Domain Oriented approach wasn't the best choice to showcase my knowledge, considering it's just a small project that won't scale up. Nevertheless, I hope it captures your attention.

### Setup
To set up the project all you need is to run:

```shell
bash local_setup.sh
```