import { Component, OnInit } from '@angular/core';
import { Movie } from '../../models/movie';
// import { fakeMovies } from '../fake-movies';
import { MovieService} from '../movie.service';

@Component({
  selector: 'app-movies',
  templateUrl: './movies.component.html',
  styleUrls: ['./movies.component.css']
})
export class MoviesComponent implements OnInit {
  // movie : Movie = {
  //   id: 1,
  //   name: "Star Wars",
  //   releaseYear: 1997
  // }
  movies :Movie[];
  //  movies = fakeMovies;
  constructor(private movieService: MovieService) {

   }
  //  movies:Movie[];
  //  getMoviesFromService(): void{
  //   this.movie = this.movieService.getMovies();
  //  }

  ngOnInit() {
    this.movieService.getMovies().subscribe(
      (updatedMovies) =>{
        this.movies = updatedMovies;
        console.log(`this.movies = ${JSON.stringify(this.movies)}`);
      }
    );
  }
//Action when  select a movie in List item
// selectedMovie:Movie;
// onSelect(movie :Movie): void{
//   this.selectedMovie = movie;
//   console.log(`selectedMovie = ${JSON.stringify(this.selectedMovie)}`);
//   }
}
