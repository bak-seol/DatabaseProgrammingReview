

◆개발 환경 소개 
  MariaDB 데이터베이스를 사용하고 PHP 서버사이드 언어와 HTML 클라이언트 언어를 사용했습니다. 또 윈도우  Apache Web server를 사용하였습니다. MariaDB를 사용한 이유는
  조금 더 최근에 배워서 더 익숙하고 기억이 잘 나는 부분도 있었고, MariaDB가 Mysql보다 더 속도가 빠르다는 부분 때문입니다.

◆발견한 정보 3개 소개
  sakila 데이터베이스에서 크게 영화 정보, 직원 정보, 고객 정보를 발견하고 각각 알맞는 필드들을 테이블 형태로 출력하였습니다. 
  영화 정보의 경우 
  film_id(영화 번호),	title(영화 제목),	description(영화 설명),	release_year(영화 개봉년도),	rental_duration(대여기간),	rental_rate(대여_평가),
  length(영화 길이),	replacement_cost(대체 가격),	special_features(특징) 을 같은 테이블로 출력되게 하였습니다.
  고객 정보의 경우
  customer_id(고객번호),	first_name(성),	last_name(이름),	store_id(상점번호),	email(이메일),	active(활성화 상태),	last_update(가장 최신 업데이트 날짜) 정도의 중요한
  필드만 출력되게 하였습니다.
  직원 정보의 경우
  staff_id(직원번호),	first_name(성),	last_name(이름),	store_id(상점번호),	email(이메일),	username(유저이름),	password(유저비번) 의 필드가 같이 출력되게 하였습니다.

◆동작 화면 소개 영상
  https://youtu.be/J18TPHUcw-0
