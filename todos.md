What is the point of the web app ?
    I can follow the statistics where i can see what companies responed to me
    and tomo and other devs can see do i made some mistake
# Guest users   
    Table with jobs applied (home page)
    Can apply filters (home page)
    Can search throught jobs (home page)

# Admin user
    Table with action edit 
        I can change the status of the job applied 
        And after i add the mark generic rejection, or rejection that no more edit possible
    Add new job applied 

### Entity
    Job {
        company name
        link to advertisement
        status {
            applied
            generic rejection
            rejection-hr
            rejection-technical interview
            rejection-end
        }
        summary 
    }
    User {
        standard fields
    }
