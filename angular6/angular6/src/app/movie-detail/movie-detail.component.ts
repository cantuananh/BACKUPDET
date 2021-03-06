import { Component, OnInit, Input } from '@angular/core';
import { Movie } from '../../models/movie';
import { Location } from '@angular/common';
import { ActivatedRoute } from '@angular/router';
import { MovieService } from '../movie.service';

@Component({
  selector: 'app-movie-detail',
  templateUrl: './movie-detail.component.html',
  styleUrls: ['./movie-detail.component.css'] 
})
export class MovieDetailComponent implements OnInit {
@Input() movie : Movie;
  constructor(
    private route:ActivatedRoute,
    private movieService:MovieService,
    private location: Location,
  ) { }

  ngOnInit() {
    this.getMovieFromRoute; 
  }
  getMovieFromRoute(): void{
    const id = +this.route.snapshot.paramMap.get('id');
    console.log(`this.route.snapshot.paramMap= ${JSON.stringify(this.route.snapshot.paramMap)}` )
     //call service to "get movie from id"
     this.movieService.getMovieFromId(id).subscribe(movie => this.movie = movie);
  }
  goBack(): void{
      this.location.back();
    }

}
